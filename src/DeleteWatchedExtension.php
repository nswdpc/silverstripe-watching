<?php

declare(strict_types=1);

namespace Symbiote\Watch;

use Exception;
use SilverStripe\Core\Extension;
use SilverStripe\Versioned\Versioned;

/**
 * @extends \SilverStripe\Core\Extension<static>
 */
class DeleteWatchedExtension extends Extension
{
    public function onAfterDelete(): void
    {
        if (Versioned::get_stage() === Versioned::DRAFT) {
            // find all items being watched
            /** @var \SilverStripe\ORM\DataObject $owner */
            $owner = $this->getOwner();
            $watches = ItemWatch::get()->filter([
                "WatchedClass" => $owner::class,
                "WatchedID" => $owner->ID,
            ]);
            try {
                foreach ($watches as $watch) {
                    $watch->delete();
                }
            } catch (Exception) {

            }

        }
    }
}
