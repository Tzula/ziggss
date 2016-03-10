<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\Registry\Registry;
require_once __DIR__ . '/../../helpers/general.php';

/**
 * HTML View class for the Content component
 *
 * @since  1.5
 */
class ContentViewGeneral extends JViewLegacy
{
	protected $games;
	protected $cid;
	protected $gameid;

	/**
	 * Execute and display a template script.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a Error object.
	 */
	public function display($tpl = null)
	{
				// Get application
		$app = JFactory::getApplication();
		$this->pagination    = $this->get('Pagination');
		$this->items			= $this->get('Items');
		$this->games            =GeneralHelper::getGameIdOptions();
		$this->cid              = $this->get('Cid');
		$this->gameid           = $this->get('Gameid');
		

 
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
 
			return false;
		}
		
	foreach ($this->items as $item)
		{
		
			$dispatcher = JEventDispatcher::getInstance();
		
			JPluginHelper::importPlugin('content');
				
				
			// Old plugins: Ensure that text property is available
			if (!isset($item->text))
			{
				if ($item->fulltext == ''){
					$item->text = $item->introtext;
				}else{
					$item->text = $item->fulltext;
				}
			}
				
		
			$dispatcher->trigger('onContentPrepare', array ('com_content.news', &$item, &$item->params, 0));
		}
 

 		
		// Display the template
		parent::display($tpl);
	}

	/**
	 * Prepares the document
	 *
	 * @return  void
	 */
	protected function prepareDocument()
	{
		$app     = JFactory::getApplication();
		$menus   = $app->getMenu();
		$pathway = $app->getPathway();
		$title   = null;

		// Because the application sets a default page title,
		// we need to get it from the menu item itself
		$menu = $menus->getActive();

		if ($menu)
		{
			$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
		}
		else
		{
			$this->params->def('page_heading', JText::_('JGLOBAL_ARTICLES'));
		}

		$title = $this->params->get('page_title', '');

		$id = (int) @$menu->query['id'];

		// If the menu item does not concern this article
		if ($menu && ($menu->query['option'] != 'com_content' || $menu->query['view'] != 'article' || $id != $this->item->id))
		{
			// If this is not a single article menu item, set the page title to the article title
			if ($this->item->title)
			{
				$title = $this->item->title;
			}

			$path     = array(array('title' => $this->item->title, 'link' => ''));
			$category = JCategories::getInstance('Content')->get($this->item->catid);

			while ($category && ($menu->query['option'] != 'com_content' || $menu->query['view'] == 'article' || $id != $category->id) && $category->id > 1)
			{
				$path[]   = array('title' => $category->title, 'link' => ContentHelperRoute::getCategoryRoute($category->id));
				$category = $category->getParent();
			}

			$path = array_reverse($path);

			foreach ($path as $item)
			{
				$pathway->addItem($item['title'], $item['link']);
			}
		}

		// Check for empty title and add site name if param is set
		if (empty($title))
		{
			$title = $app->get('sitename');
		}
		elseif ($app->get('sitename_pagetitles', 0) == 1)
		{
			$title = JText::sprintf('JPAGETITLE', $app->get('sitename'), $title);
		}
		elseif ($app->get('sitename_pagetitles', 0) == 2)
		{
			$title = JText::sprintf('JPAGETITLE', $title, $app->get('sitename'));
		}

		if (empty($title))
		{
			$title = $this->item->title;
		}

		$this->document->setTitle($title);

		if ($this->item->metadesc)
		{
			$this->document->setDescription($this->item->metadesc);
		}
		elseif (!$this->item->metadesc && $this->params->get('menu-meta_description'))
		{
			$this->document->setDescription($this->params->get('menu-meta_description'));
		}

		if ($this->item->metakey)
		{
			$this->document->setMetadata('keywords', $this->item->metakey);
		}
		elseif (!$this->item->metakey && $this->params->get('menu-meta_keywords'))
		{
			$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
		}

		if ($this->params->get('robots'))
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}

		if ($app->get('MetaAuthor') == '1')
		{
			$author = $this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author;
			$this->document->setMetaData('author', $author);
		}

		$mdata = $this->item->metadata->toArray();

		foreach ($mdata as $k => $v)
		{
			if ($v)
			{
				$this->document->setMetadata($k, $v);
			}
		}

		// If there is a pagebreak heading or title, add it to the page title
		if (!empty($this->item->page_title))
		{
			$this->item->title = $this->item->title . ' - ' . $this->item->page_title;
			$this->document->setTitle(
				$this->item->page_title . ' - ' . JText::sprintf('PLG_CONTENT_PAGEBREAK_PAGE_NUM', $this->state->get('list.offset') + 1)
			);
		}

		if ($this->print)
		{
			$this->document->setMetaData('robots', 'noindex, nofollow');
		}
	}
}
