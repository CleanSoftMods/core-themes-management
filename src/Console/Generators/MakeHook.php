<?php namespace WebEd\Base\ThemesManagement\Console\Generators;

class MakeHook extends AbstractGenerator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'theme:make:hook
    	{name : The class name}';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Action';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../../../resources/stubs/hooks/hook.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return 'Actions\\' . $this->argument('name') . 'Hook';
    }
}
