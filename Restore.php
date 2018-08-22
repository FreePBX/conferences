<?php
namespace FreePBX\modules\Conferences;
use FreePBX\modules\Backup as Base;
class Restore Extends Base\RestoreBase{
  public function runRestore($jobid){
        $configs = reset($this->getConfigs());
        $this->FreePBX->Conferences->bulkhandlerImport('conferences', $configs);
    }
    public function processLegacy($pdo, $data, $tables, $unknownTables, $tmpfiledir){
        $tables = array_flip($tables + $unknownTables);
        if (!isset($tables['meetme'])) {
            return $this;
        }
        $cb = $this->FreePBX->Conferences;
        $cb->setDatabase($pdo);
        $configs = $cb->bulkhandlerExport('conferences');
        $cb->resetDatabase();
        $this->FreePBX->Conferences->bulkhandlerImport('conferences', $configs);

        return $this;
    }
}
