<?php

namespace Codedcell\ViewCreator\Traits;

trait LivewireDelete
{
    public $deleteId;
    public $showDeleteModal = false;
    public $deleteMessage = "Are you sure you want to delete this item?";

    public function __construct(?string $message = null, ?string $type = "info", ?Component &$component = null)
    {
        $this->component = $component;
        $this->message = $message;
        $this->type = $type;
    }


    public function showDeleteDialog()
    {
        $this->showDeleteModal = true;
    }

    public function deleteItem()
    {
    }

    public function cancelDelete()
    {

        $this->showDeleteModal = false;
    }
}
