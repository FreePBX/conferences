<?php
namespace FreePBX\modules\Conferences;
use FreePBX\modules\Backup as Base;
class Restore Extends Base\RestoreBase{
	public function runRestore(){
			$configs = $this->getConfigs();
			$this->FreePBX->Conferences->bulkhandlerImport('conferences', $configs['data']);
			$this->importKVStore($config['kvstore']);
			$this->importFeatureCodes($config['features']);
			$this->importAdvancedSettings($config['settings']);
		}
		public function processLegacy($pdo, $data, $tables, $unknownTables){
			$this->restoreLegacyAll($pdo);
		}
}
