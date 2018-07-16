<?php
namespace FreePBX\modules\Conferences;
use FreePBX\modules\Backup as Base;
class Restore Extends Base\RestoreBase{
  public function runRestore($jobid){
        $configs = reset($this->getConfigs());
        $this->FreePBX->Conferences->bulkhandlerImport('conferences', $configs);
    }
}
