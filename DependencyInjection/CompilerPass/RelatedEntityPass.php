<?php
/**
 * Created by PhpStorm.
 * User: ilya
 * Date: 07.02.18
 * Time: 12:59
 */

namespace JMS\JobQueueBundle\DependencyInjection\CompilerPass;


use JMS\JobQueueBundle\Entity\Repository\JobRepository;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class RelatedEntityPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if ($container->getParameter('jms_job_queue.related_entities')) {
            $container->getDefinition(JobRepository::class)->addMethodCall('setRegistry', array(new Reference('doctrine')));
        }
    }
}