<?php
namespace GDO\CKEditor\Method;

use GDO\CKEditor\GDO_CKFile;
use GDO\Core\GDT_Array;
use GDO\Core\GDT_Response;
use GDO\Core\Method;
use GDO\File\GDO_File;
use GDO\File\GDT_File;

/**
 * Upload an attachment via the CKEditor.
 *
 * @author gizmore
 */
final class Upload extends Method
{

	public function isTrivial(): bool
	{
		return false;
	}

	public function execute()
	{
		$file = GDO_File::fromForm($_FILES['upload']);
		$gdt = GDT_File::make('upload');
		if (!$gdt->validate($file))
		{
			return GDT_Response::makeWith($gdt);
		}

		$ckfile = GDO_CKFile::blank([
			'ckf_file' => $file->getID(),
		])->insert();

		$json = ['url' => $ckfile->getHREF()];
		return GDT_Array::makeWith($json);
	}


}
