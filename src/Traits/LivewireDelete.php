<?php

namespace Codedcell\ViewCreator\Traits;

trait LivewireDelete
{

    public $showDeleteModal = false;
    public $deleteId = null;
    public $deleteMessage = "Are you sure you want to delete this item?";


    public function showDeleteDialog($id)
    {

        $this->deleteId = $id;
        $this->dispatchBrowserEvent('livewire-deleter-open');
        $this->showDeleteModal = true;
    }

    public function deleteItem($model, $relationshipCheck = [])
    {
        $nonDeletable = [];
        $model = app("App\Models\\" . $model);
        foreach ($relationshipCheck as $key => $value) {
            if ($model->find($this->deleteId)->$value()->exists()) {
                $nonDeletable[] = $value;
            }
        }
        $validatingModel = $model->find($this->deleteId);
        $this->authorize('delete', $validatingModel);
        if (count($nonDeletable) > 0) {
            $this->dispatchBrowserEvent('livewire-deleter-close');
            $this->toaster("This item cannot be deleted because it has a relationship with " . implode(", ", $nonDeletable), "error");
        } else {
            $model->destroy($this->deleteId);
            $this->dispatchBrowserEvent('livewire-deleter-close');
            $this->toaster("Item Deleted", "success");
        }
    }


    public function cancelDelete()
    {
        $this->dispatchBrowserEvent('livewire-deleter-close');
        $this->showDeleteModal = false;
    }
}
