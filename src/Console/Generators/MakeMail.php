<?php namespace WebEd\Base\ThemesManagement\Console\Generators;

class MakeMail extends AbstractGenerator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'theme:make:mail
    	{alias : The alias of the module}
    	{name : The class name}';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Mail';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../../../../resources/stubs/mails/mail.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return 'Mails\\' . $this->argument('name') . 'Mail';
    }
}
