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
        ini_set('memory_limit','128M');
        $regen = $input->getOption('regen');
        /* @var $doc Registry */
        $doc = $this->getContainer()->get('doctrine');
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $doc->getManager();
        //$em->getConnection()->getWrappedConnection()->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        /* @var $prodRepo EntityRepository */
        $prodRepo = $em->getRepository(Products::class);
        $nq = $em->createQuery();
        $nq->setDQL("UPDATE AppBundle:ProductsOrder po SET po.poRand = rand()*1000000,po.poLastmodified = :now");
        $nq->setParameter("now", time());
        $nq->execute();

        $maxp = $em->createQuery();
        $maxp->setDQL("SELECT count(p) as x FROM AppBundle:Products p "
                . "LEFT JOIN AppBundle:ProductsOrder po WITH(p.prodId = po.poProd) "
                . "WHERE po.poRand is null");
        $maxpCount = ceil($maxp->getSingleScalarResult() / 200);
        $i = 0;
        $j = 0;
        $em->beginTransaction();
        while ($j <= $maxpCount) {
            /* @var $qb QueryBuilder */
            $qb = $prodRepo->createQueryBuilder('p');
            $qb->select('partial p.{prodId}');
            $qb->leftJoin('p.prodPo', 'po');
            $qb->where('po.poProd is null');

            $qry = $qb->getQuery();
            $qry->setMaxResults(200);
            $qry->setFirstResult($j * 200-$i);
            $resultSet = $qry->getArrayResult();
            foreach ($resultSet as $prod) {
                $prodPo = new ProductsOrder();
                $prodPo->setPoProd($em->getReference(Products::class, $prod['prodId']));
                $prodPo->setPoRand(mt_rand(0, 2 << 32 - 1));
                $prodPo->setPoAddtime(time());
                $prodPo->setPoLastmodified(time());
                $em->persist($prodPo);
                $i++;
            }
            $em->flush();
            $em->clear();
            $qry->free();
            $j++;
        }
        $em->flush();
        $em->clear();
        $em->commit();
    }

}
