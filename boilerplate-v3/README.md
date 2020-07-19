## Boilerplate plugin class for phpMussel v3.

In theory, it should generally be possible to extend phpMussel v3 as to be able to do almost anything which is conceivably possible to do in PHP.

By the fact of your reading of this text and reviewing this boilerplate, I would assume that you're already reasonably familiar with phpMussel v3 from the standpoint of basic installation, usage, and structure. If such is the case, working with this boilerplate should be reasonably straightforward and easy for you. But, if not, I would recommend familiarising yourself with those things first, because going any further with this boilerplate could be potentially confusing and difficult otherwise.

Other than this README, you should see three things in this directory:

1. An "assets" directory.
2. An "l10n" directory.
3. An "src" directory.

The "src" directory is intended for any PHP classes compatible with Composer's autoloader (PSR-4/PSR-4). For the purpose of this boilerplate, it contains just one class:

`phpMussel\BoilerplateV3\BoilerplateV3`

The "l10n" directory is intended for any L10N data needed by the plugin. This includes descriptions for any attached configuration directives to be utilised by the front-end. It should follow the same structure utilised by other phpMussel components.

The "assets" directory is intended to contain any other data needed by the plugin (with the exception of any additional third-party dependencies, which should be automatically placed into their own directories by Composer, and should preferably not become the responsiblity of the plugin itself). For the purpose of this boilerplate, it contains just one file: "config.yml". That file tells phpMussel about the configuration directives needed by the plugin, which allows phpMussel to populate any needed fallbacks for that configuration and to display them correctly at the front-end configuration page.

To see the existing boilerplate code in action, the implementation will need to use the events orchestrator to instantiate the boilerplate itself as an event handler at the "atEndOf_scan" event.

As an example:

```PHP
<?php
// Path to vendor directory.
$Vendor = __DIR__ . DIRECTORY_SEPARATOR . 'vendor';

// Composer's autoloader.
require $Vendor . DIRECTORY_SEPARATOR . 'autoload.php';

$Loader = new \phpMussel\Core\Loader();
$Scanner = new \phpMussel\Core\Scanner($Loader);
$FrontEnd = new \phpMussel\FrontEnd\FrontEnd($Loader, $Scanner);
$Web = new \phpMussel\Web\Web($Loader, $Scanner);

// This line here is where we're doing what I described above.
$Loader->Events->addHandler('atEndOf_scan', new \phpMussel\BoilerplateV3\BoilerplateV3($Loader));

// Scans file uploads (execution terminates here if the scan finds anything).
$Web->scan();
```

The boilerplate code in this case works by taking advantage of the `__invoke` magic method provided by PHP. However, you can also add new event handlers by using closures (anonymous functions), which usually would be defined at the constructor (but can be defined wherever you want, as long as that point in your codebase is otherwise executed at some point, in order to have the event handler added during execution). The default logging mechanism in phpMussel does it that way.

*An excerpt from `Scanner.php` (the phpMussel core):*

```PHP
        /**
         * Writes to the standard scan log upon scan completion.
         *
         * @return bool True on success; False on failure.
         */
        $this->Loader->Events->addHandler('writeToScanLog', function (): bool {
            /** Guard. */
            if (
                strlen($this->Loader->ScanResultsFormatted) === 0 ||
                !$this->Loader->Configuration['core']['scan_log'] ||
                !($File = $this->Loader->buildPath($this->Loader->Configuration['core']['scan_log']))
            ) {
                return false;
            }

            $Results = sprintf(
                "%s %s\n%s%s %s\n\n",
                $this->Loader->InstanceCache['StartTime2822'],
                sprintf($this->Loader->L10N->getString('grammar_fullstop'), $this->Loader->L10N->getString('started')),
                $this->Loader->ScanResultsFormatted,
                $this->Loader->InstanceCache['EndTime2822'],
                sprintf($this->Loader->L10N->getString('grammar_fullstop'), $this->Loader->L10N->getString('finished'))
            );

            if (!file_exists($File)) {
                $Results = \phpMussel\Core\Loader::SAFETY . "\n" . $Results;
                $WriteMode = 'wb';
            } else {
                $WriteMode = (
                    $this->Loader->Configuration['core']['truncate'] > 0 &&
                    filesize($File) >= $this->Loader->readBytes($this->Loader->Configuration['core']['truncate'])
                ) ? 'wb' : 'ab';
            }

            $Handle = fopen($File, 'ab');
            fwrite($Handle, $Results);
            fclose($Handle);
            $this->Loader->logRotation($this->Loader->Configuration['core']['scan_log']);
            return true;
        });
```

If you want, you can append new event handlers to the existing stack for a given event, or replace the entire stack with just your new event, or just outright delete the entire stack, or event protect the stack against other, future additions which might otherwise occur at some point in the execution chain. To understand how that works, you can read the documentation for the __*[events orchestrator](https://github.com/Maikuolan/Common/blob/v2/_docs/Events.md)*__.

### Currently supported events:

__Event__ | __Description__
---|---
__afterChameleonDetections__ | Fired immediately after chameleon attack detections finish for the current scan target.
__afterURLScanner__ | Fired immediately after the URL scanner finishes processing the current scan target.
__afterVirusTotal__ | Fired after all Virus Total API lookups have finished for the current scan target.
__atEndOf_scan__ | Fired immediately before the scanner returns the scan results.
__atStartOf_archiveRecursor__ | Fired right at the very beginning of a new archive recursor iteration.
__atStartOf_dataHandler__ | Fired right at the very beginning of a new dataHandler iteration.
__atStartOf_metaDataScan__ | Fired right at the very beginning of a new metadata scan iteration.
__atStartOf_normalise__ | Fired immediately before phpMussel attempts to normalise data.
__atStartOf_quarantine__ | Fired right at the very beginning of a new quarantine iteration.
__atStartOf_recursor__ | Fired right at the very beginning of a new recursor iteration.
__atStartOf_scan__ | Fired right at the very beginning of a new scan operation.
__atStartOf_web_scan__ | Fired immediately when the upload handler's scan method executes.
__beforeChameleonDetections__ | Fired immediately before chameleon attack detections begin for the current scan target.
__beforeOutput__ | Fired immediately before the upload handler sends page output, and only if there's output to send (i.e., if nothing was blocked, or if the template files are missing, it won't fire).
__beforeSigFile__ | Fired right at the very beginning of the new iteration of any signature file for the current scan target.
__beforeSigFile__ | Fired right at the very beginning of the new iteration of any signature file for the current scan target.
__beforeSigFiles__ | Fired immediately before any particular given signature file class begins iterating for the current scan target.
__beforeURLScanner__ | Fired immediately before the URL scanner begins processing the current scan target.
__beforeVirusTotal__ | Fired immediately before Virus Total API lookups occur for the current scan target.
__before_scan__ | Fired during recursor iterations, just before it begins processing the current scan target.
__countersChanged__ | During any particular scan operation, phpMussel tracks how many files it has finished scanning, and tracks how many files there are remaining to be scanned. Whenever these numbers change (e.g., a new file is found, or it finishes scanning a file), this event is fired (and will most likely fire multiple times during the scan operation).
__error__ | Fired whenever an error, warning, or notice occurs.
__final__ | Fired when the loader is destroyed.
__frontend_before_page__ | Fired when the front-end view method executes, after preparing some basic variables needed for displaying front-end pages, but before preparing any page output (available only if the phpMussel front-end is installed).
__sendMail__ | Fired whenever phpMussel tries to send an email (e.g., to send notifications about blocked uploads, and to send two-factor authentication codes to front-end users).
__writeToPHPMailerEventLog__ | Fired whenever the phpMussel-PHPMailer linker is invoked, after it has finished attempting to send an email (whether successfully, unsuccessfully, or otherwise), and is ready to log the results (available only if the phpMussel-PHPMailer linker is installed).
__writeToScanLog__ | Fired when the outermost recursor has finished and phpMussel is ready to log the results.
__writeToSerialLog__ | Fired when the outermost recursor has finished and phpMussel is ready to log the results.
__writeToUploadsLog__ | Fired when the upload handler has finished scanning uploads and is ready to log the results, but before sending any page output, and only if an upload was blocked.

New events may be added in the future, and may be added upon request. If you would like to see additional events added, you are welcome to create a new issue to let us know about it. :-)

---


Last Updated: 19 July 2020 (2020.07.19).
