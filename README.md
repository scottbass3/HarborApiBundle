# Harbor API Bundle

A Symfony bundle to communicate with Harbor API v2. This bundle is a wrapper for [harbor api client](https://github.com/scottbass3/harbor-api-client).

## Installation
If your application is using Symfony Flex, run this command to install the bundle :
```shell
composer require scottbass3/harbor-api-bundle
```

Then add the configuration in your packages config directory :
```yaml
# config/packages/scottbass3_harbor_api.yaml
scottbass3_harbor_api:
    base_uri: 'https://exemple.com/api/v2.0'
    login: 'test'
    password: 'changeme'
```

## Basic Usage

```php
namespace App\Controller;

use Scottbass3\HarborApiBundle\HarborClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController {
    public function index(HarborClient $client) {
        $projectReq = (new ProjectReq())
            ->setProjectName('my-project');
        $client->getHarborClient()->createProject($projectReq); 
        
        $artifacts = $client->getHarborClient()->listArtifacts('my-project', 'my-repository');
    }
}
```