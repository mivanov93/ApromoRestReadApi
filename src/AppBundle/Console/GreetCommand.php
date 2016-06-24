<?php

namespace AppBundle\Console;

use AppBundle\Entity\Products;
use AppBundle\Entity\ProductsOrder;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GreetCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                ->setName('apromo:prod_rand_order')
                ->setDescription('Generate products random order data')
                ->addOption(
                        'regen', null, InputOption::VALUE_NONE, 'If set, the task will yell in uppercase letters'
                )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $regen = $input->getOption('regen');
        /* @var $doc Registry */
        $doc = $this->getContainer()->get('doctrine');
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $doc->getManager();
        //$em->getConnection()->getWrappedConnection()->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        /* @var $prodRepo EntityRepository */
        $prodRepo = $em->getRepository(Products::class);
//        $nq = $em->createQuery();
//        $nq->setDQL("UPDATE AppBundle:ProductsOrder po SET po.poRand = rand()*1000000,po.poLastmodified = :now");
//        $nq->setParameter("now", time());
//        $nq->execute();

        $i = 0;
        $j = 0;
        $em->beginTransaction();
        $found = true;
        while ($found) {
            /* @var $qb QueryBuilder */
            $qb = $prodRepo->createQueryBuilder('p');
            $qb->select('p,po');
            $qb->leftJoin('p.prodPo', 'po');
            // $qb->where('po.poProd is null');

            $qry = $qb->getQuery();
            $qry->setMaxResults(500);
            $qry->setFirstResult($j * 500);
            $found = false;
            $resultSet = $qry->execute();
            foreach ($resultSet as $row) {
                $found = true;
                $prod = $row;
                $prodPo = new ProductsOrder();
                $prodPo->setPoProd($prod);
                $prodPo->setPoRand(mt_rand(0, 2 << 32 - 1));
                $prodPo->setPoAddtime(time());
                $prodPo->setPoLastmodified(time());
                $em->persist($prodPo);
                //  if ($i % 101 === 100) {
                $output->writeln("Clearing ");
                $em->flush();
                $em->clear();
                // }
                $i++;
            }
            $qry->free();
            $j++;
        }
        $em->commit();
    }

}
