<?php
declare(strict_types=1);
namespace MageMastery\Todo\Service;

use MageMastery\Todo\Api\TaskManagementInterface;
use MageMastery\Todo\Api\TaskRepositoryInterface;
use MageMastery\Todo\Api\TaskStatusManagementInterface;
use MageMastery\Todo\Model\Task;

class TaskStatusManagement implements TaskStatusManagementInterface
{
    /**
     * @var TheRepositoryInterface
     */
        private $repository;
      
        /**
        * @var TaskManagementInterface
        */
    private $taskmanagement;
    
    /**
     *TaskStatusManagement constructor.
     * @param TaskRepositoryInterface $taskRepository
     * @param TaskManagementInterface $taskmanagement
     */
    public function __construct(
        TaskRepositoryInterface $taskRepository,
        TaskManagementInterface $taskmanagement

    ){
        $this->repository = $taskRepository;
        $this->taskmanagement = $taskmanagement;
    }
        /**
         * @param integer $taskId
         * @param string $status
         * @param string $label
         * @return boolean
         */
        public function change(int $taskId, string $status, string $label): bool
        {
            if(!in_array($status, ['open', 'complete'])) {
                return true;
            }
            $task = $this->repository->get($taskId);
            $task->setData(Task::STATUS, $status);
            $task->setData(Task::LABEL, $label);
           
           
            $this->taskmanagement->save($task);
       
            return true;
        }

    }