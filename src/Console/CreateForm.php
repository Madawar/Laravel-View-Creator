<?php

namespace Codedcell\ViewCreator\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;

class CreateForm extends GeneratorCommand
{
    protected $signature = 'codedcell:view';

    protected $description = 'Generate Form Views For Application';

    protected function getStub()
    {
        return __DIR__ . '/stubs/foo.php.stub';
    }

    public function handle()
    {
        $this->info('Installing BlogPackage...');
        $models   = $this->getAvailableModels();
        $model = $this->choice(
            'What model do you want to generate?',
            $models,
        );
        $ModelObject = new $model;
        $column_names = Schema::getColumnListing($ModelObject->getTable());
        $form_stub =  $this->createForm($column_names, $model);
        $model_singular = Str::of(Str::of($model)->after('\\App\Models\\'))->lower();
        $form_path = base_path('resources/views/generated/' . 'create_' . $model_singular . '.blade.php');
        if (!File::exists(base_path('resources/views/generated'))) {
            File::makeDirectory(base_path('resources/views/generated'));
            File::put($form_path, $form_stub);
        } else {
            File::put($form_path, $form_stub);
        }
        $this->info('Installed BlogPackage');
    }

    public function createForm($attributes, $model)
    {
        $form_stub = null;
        $model = Str::of($model)->after('\\App\Models\\');
        $attributes = array_combine($attributes, $attributes);
        $attributes = Arr::except($attributes, ['updated_at', 'password', 'id', 'created_at', 'deleted_at']);
        foreach ($attributes as $input) {
            $choice = $this->choice(
                'What Kind of Form Element is ' . $input,
                ['input', 'select', 'radio', 'textarea', 'password', 'checkbox'],
            );
            $label =  $this->anticipate('Label For : ' . $input, [Str::title(str_replace('_', ' ', $input))]);
            $placeholder =  $this->anticipate('Placeholder For : ' . $input, [Str::title(str_replace('_', ' ', $input))]);

            $form_stub =  $form_stub . $this->getForm($label, $placeholder, $input, $model, [], $choice);
        }
        $file = __DIR__ . '/stubs/placeholders/create.stub';
        $contents = file_get_contents($file);
        $model_variable = Str::of($model)->after('\\App\Models\\')->lower();
        $stub = str_replace(array('footer_x', 'form_x', 'header_x', 'model_x', 'model_v'), array('My Footer', $form_stub, 'My Header', $model, $model_variable), $contents);
        return $stub;
    }
    public function getForm($label = 'Label', $placeholder = 'Placeholder', $name = 'Name', $model = 'Model', $options = [], $type = 'input')
    {
        $file_choice = __DIR__ . '/stubs/forms/' . $type . '.stub';
        $contents = file_get_contents($file_choice);
        $model_variable = Str::of($model)->after('\\App\Models\\')->lower();
        $stub = str_replace(array('label_x', 'placeholder_x', 'name_x', 'model_x'), array($label, $placeholder, $name, $model_variable, $options), $contents);
        return $stub;
    }

    public  function getAvailableModels()
    {

        $models = [];
        $modelsPath = app_path('Models');
        $modelFiles = File::allFiles($modelsPath);
        foreach ($modelFiles as $modelFile) {
            $models[] = '\App\\Models\\' . $modelFile->getFilenameWithoutExtension();
        }

        return $models;
    }
}
