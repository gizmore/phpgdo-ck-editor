<?php
namespace GDO\CKEditor;

use GDO\Core\GDO_Module;
use GDO\Language\GDO_Language;
use GDO\UI\GDT_Message;
use GDO\HTML\Decoder;

/**
 * CKEditor bindings.
 *
 * @author gizmore
 * @version 7.0.2
 * @since 6.8.0
 */
final class Module_CKEditor extends GDO_Module
{

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
			'ckeditor5/'
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
		GDT_Message::addDecoder('CKEditor', [Decoder::class, 'purify']);
	}

	public function onIncludeScripts(): void
	{
		$iso = GDO_Language::current()->getISO();
		$this->addJS('ckeditor5/build/ckeditor.js');
		$this->addJS('ckeditor5/build/translations/' . $iso . '.js');
		$this->addJS('js/gdo7-ckeditor.js');
	}

}
