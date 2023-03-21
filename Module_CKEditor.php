<?php
namespace GDO\CKEditor;

use GDO\Core\GDO_Module;
use GDO\HTML\Module_HTML;
use GDO\Language\GDO_Language;
use GDO\UI\GDT_Message;

/**
 * CKEditor bindings.
 *
 * @version 7.0.2
 * @since 6.8.0
 * @author gizmore
 */
final class Module_CKEditor extends GDO_Module
{

	public string $license = 'MIT';

	public function getDependencies(): array
	{
		return [
			'HTML',
			'JQuery',
		];
	}

	public function thirdPartyFolders(): array
	{
		return [
			'ckeditor5/',
		];
	}

	public function getLicenseFilenames(): array
	{
		return [
			'ckeditor5/LICENSE.md',
		];
	}

	public function onLoadLanguage(): void
	{
		$this->loadLanguage('lang/ckeditor');
	}

	public function getClasses(): array
	{
		return [
			GDO_CKFile::class,
		];
	}

	# ###########
	# ## Init ###
	# ###########
	public function onModuleInit(): void
	{
		GDT_Message::addDecoder('CKEditor', [Module_HTML::instance(), 'purify']);
	}

	public function onIncludeScripts(): void
	{
		$iso = GDO_Language::current()->getISO();
		$this->addJS('ckeditor5/build/ckeditor.js');
		$this->addJS('ckeditor5/build/translations/' . $iso . '.js');
		$this->addJS('js/gdo7-ckeditor.js');
	}

}
