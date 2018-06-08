<?php
namespace FreePBX\modules\Conferences;
use FreePBX\modules\Backup as Base;
class Restore Extends Base\RestoreBase{
  public function runRestore($jobid){
        $configs = $this->getConfigs();
        $this->FreePBX->Callwaiting->bulkhandlerImport('conferences', $configs);
    }
}