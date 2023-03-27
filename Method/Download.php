<?php
namespace GDO\CKEditor\Method;

use GDO\CKEditor\GDO_CKFile;
use GDO\Core\GDT;
use GDO\Core\GDT_Object;
use GDO\Core\Method;
use GDO\File\Method\GetFile;

/**
 * Download an attached file.
 *
 * @version 7.0.2
 * @author gizmore
 */
final class Download extends Method
{

	public function isTrivial(): bool
	{
		return false;
	}

	public function gdoParameters(): array
	{
		return [
			GDT_Object::make('cfk_id')->table(GDO_CKFile::table())->notNull(),
		];
	}

	public function execute(): GDT
	{
		if ($ckfile = $this->getFile())
		{
		}
		{
			$_REQUEST['file'] = $ckfile->getFileID();
			return GetFile::make()->execute();
		}
	}

	public function getFile(): GDO_CKFile
	{
		return $this->gdoParameterValue('cfk_id');
	}

}
