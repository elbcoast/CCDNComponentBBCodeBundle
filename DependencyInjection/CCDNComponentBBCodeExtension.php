<?php

/*
 * This file is part of the CCDNComponent BBCodeBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/> 
 * 
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNComponent\BBCodeBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Config\FileLocator;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 * 
 * @author Reece Fowell <reece@codeconsortium.com> 
 * @version 1.0
 */
class CCDNComponentBBCodeExtension extends Extension
{
	
	
	
    /**
     * {@inheritDoc}
     */
	public function getAlias()
	{
		return 'ccdn_component_bb_code';
	}
	
	
	
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

		$this->getEditorSection($container, $config);
		$this->getParserSection($container, $config);
    }
	
	
	
	/**
	 *
	 * @access private
	 * @param $container, $config
	 */
	private function getEditorSection($container, $config)
	{
		$container->setParameter('ccdn_component_bb_code.editor.enable', $config['editor']['enable']);
	}
	
	
	
	/**
	 *
	 * @access private
	 * @param $container, $config
	 */
	private function getParserSection($container, $config)
	{
		$container->setParameter('ccdn_component_bb_code.parser.enable', $config['parser']['enable']);
	}


}
