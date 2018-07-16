<?php
namespace FreePBX\modules\Conferences;
use FreePBX\modules\Backup as Base;
class Backup Extends Base\BackupBase{
  public function runBackup($id,$transaction){
    $configs = $this->FreePBX->Conferences->bulkhandlerExport('conferences');
    if(!empty($configs)){
        $this->addConfigs($configs);
        $this->addDependency('recordings');
        $this->addConfigs($configs);
    }
  }
}
