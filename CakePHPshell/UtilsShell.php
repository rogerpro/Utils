<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Utility\Text;

class UtilsShell extends Shell
{

    /**
     * Reset UUID keys for a model.
     */
    public function rekey($model = '')
    {
        $this->loadModel($model);
        $q = $this->$model->find();
        
        foreach ($q as $key => $value) {
            $this->$model->query()
                ->update()
                ->set([
                'id' => Text::uuid()
            ])
                ->where([
                'id' => $value->id
            ])
                ->execute();
        }
    }
}
