<?php

namespace Drupal\cypress;

use Consolidation\SiteProcess\Util\Tty;
use Symfony\Component\Process\Process;

/**
 * Process manager that attempts to stream output to TTY.
 */
class TtyProcessManager implements ProcessManagerInterface {

  /**
   * {@inheritDoc}
   */
  public function run(array $commandLine, $workingDirectory, $environment = []) {
    $process = new Process($commandLine, $workingDirectory);
    $process->setTty(Tty::isTtySupported());
    $process->mustRun();
  }
}