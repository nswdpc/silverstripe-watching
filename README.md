# Silverstripe Watching

Adds content watching to your site

## Composer Install

> Add this repo's URL first as a repository entry in composer.json

```sh
composer require symbiote/silverstripe-watching
```

## Requirements

* Silverstripe 5+

## Documentation

### Use with the silverstripe-notifications module

```
SilverStripe\CMS\Model\SiteTree:
  extensions:
    - Symbiote\Watch\Extension\ContentWatchNotification
SilverStripe\Core\Injector\Injector:
  Symbiote\Watch\Extension\ContentWatchNotification: 
    properties:
      watchService: %$Symbiote\Watch\WatchService
      notificationService: %$Symbiote\Notifications\Service\NotificationService
```
