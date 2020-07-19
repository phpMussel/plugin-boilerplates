<?php
/**
 * Boilerplate plugin class for phpMussel v3.
 */

namespace phpMussel\BoilerplateV3;

class BoilerplateV3
{
    /**
     * @var \phpMussel\Core\Loader The instantiated loader object.
     */
    private $Loader;

    /**
     * @var string The path to the boilerplate asset files.
     */
    private $AssetsPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR;

    /**
     * @var string The path to the boilerplate L10N files.
     */
    private $L10NPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'l10n' . DIRECTORY_SEPARATOR;

    /**
     * Construct the boilerplate instance.
     *
     * @param \phpMussel\Core\Loader $Loader The instantiated loader object, passed by reference.
     */
    public function __construct(\phpMussel\Core\Loader &$Loader)
    {
        /** Link the loader to this instance. */
        $this->Loader = &$Loader;

        /** Load configuration defaults and perform fallbacks. */
        if (
            is_readable($this->AssetsPath . 'config.yml') &&
            $Configuration = $this->Loader->readFile($this->AssetsPath . 'config.yml')
        ) {
            $Defaults = [];
            $this->Loader->YAML->process($Configuration, $Defaults);
            if (isset($Defaults)) {
                $this->Loader->fallback($Defaults);
                $this->Loader->ConfigurationDefaults = array_merge_recursive($this->Loader->ConfigurationDefaults, $Defaults);
            }
        }

        /** Load L10N data. */
        $this->Loader->loadL10N($this->L10NPath);
    }

    /**
     * Parses the ScanResultsText through ROT13 and adds a "Hello there, buddy"
     * message after scanning finishes.
     *
     * Totally useless, really. Pointless to use in production, of course. But,
     * useful as a super simplistic demonstration of how to write phpMussel v3
     * plugins. By looking through this boilerplate code, seeing what it actually
     * does in action to the phpMussel codebase, it might inspire some ideas for
     * others to come up with some more useful things. :-)
     */
    public function __invoke(string $NotUsed): bool
    {
        /** Guard. */
        if (empty($this->Loader->ScanResultsText)) {
        }

        /** Iterate through the ScanResultsText. */
        foreach ($this->Loader->ScanResultsText as &$Results) {
            $Results = $this->Loader->L10N->getString('example_l10n_message') . $this->Loader->L10N->getString('grammar_spacer') . str_rot13($Results);
        }

        /** Exit. */
        return true;
    }
}
