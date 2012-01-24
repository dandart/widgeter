<?php
class Bootstrap
{
	const MODEL_PATH = 'models';
	const CONTROLLER_PATH = 'controllers';
	const DEFAULT_CONTROLLER = 'Default';
	const CONTROLLER_SUFFIX = 'Controller';

	public static function setup()
	{
		$dir = new DirectoryIterator(MODULE_PATH);
		foreach($dir as $modPath) {
			if($modPath->isDir() && '.' != $modPath->getFilename() && '..' != $modPath->getFilename()) {
				self::_stageTwo($modPath);
			}
		}
	}

	private static function _stageTwo(DirectoryIterator $dir)
	{
		$basePath = $dir->getPath().'/'.$dir->getFilename();
		set_include_path($basePath.'/'.self::MODEL_PATH.':'.
				 $basePath.'/'.self::CONTROLLER_PATH.':'.
			         get_include_path());
		$name = $dir->getFilename();
		$controllerName = $name.self::CONTROLLER_SUFFIX;
		$instance = new $controllerName();
		$instance->init();
	}
}
				
