<?php
declare(strict_types=1);
namespace MageMastery\Todo\Api;


/**
 * @api
 */
interface TaskStatusManagementInterface 
{

    /**
     * @param integer $taskId
     * @param string $status
     * @param string $label
     * @return bool
     */
    public function change(int $taskId, string $status, string $label): bool;
}