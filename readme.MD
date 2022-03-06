
# SOLID - PHP

This repo is result from me was learned SOLID Principle in PHP

### S - Single Responsibility Principle
These principle will suggest you for each classes should've a only one responsibility. Example if you've **User** Class,
inside those class have many methods like Delete, Update or Store User to Database, it's break SRP. So the solution
you should make a own class for each methods.

Remember if you just writes 500 line of code as App, be better if you make a dozen method with pretty name.

*Don't do this*
```php
class User
{
    public function store(){

    }

    public function update(){

    }

    public function delete(){

    }
}
```

*But do this*

```php
class StoreUser
{
    public function handle()
    {
        //code for execute action
    }
}

class DeleteUser
{
    public function handle()
    {
        //code for execute action
    }
}
```

### O - Open/Closed Principle
Open/Closed Principle meaning of the class should open for extend but closed for modify,
so when you class was Reviewed, Tested or Final this class unavailabe for modify, if you wanna
make a new feature for the class you should extend it.

Example if you have a **Shipment Provider Class** this class are able to get shipping cost
as you know in this universe have some many Shipment Provider, imagine if you in the future you
will add new providers. if you don't use these principle you should loop hard code the class for add new shipment provider.
so the solution be better if you make a for each providers and extend it
to **Shipment Provider Class Construct**

```php

class ShipmentProvider
{
    //==============BEFORE=============
    //Break Closed Principle
    //when have a new provider method
    public function getShippingFee($providerMethod)
    {
        if($providerMethod == 'PosLaju')
        {
            //getshipping code
        }

        if($providerMethod == 'Jnt')
        {
            //getshipping code
        }

        // new provider method check in the future
    }

    //==============AFTER=============
    private $shipmentProvider;

    public function __construct(ProviderMethodInterface $providerMethod)
    {
        $this->shipmentProvider = $providerMethod;
    }

    // make a method able to extend any
    // instace of provider method
    public function getShippingFee()
    {
        return $this->providerMethod->getShippingFee();
    }
}

$jnt = new Jnt();
$posLaju = new PosLaju();

echo (ShipmentProvider($jnt))->getShippingFee();
```

### L - Liskov Subtitution Principle

Liskov Subtitution is a principle to suggest you to should've a match for Method Parameter T,
Return Type from Super Class, so far what i got from these principle is how your prevent breaking changes
when do an inheritance. Imagine you've **File Class** so far we know that file only have 2 types,
writable and read only and you make a inheritance for read only file from File class.

 If File class have
save method and you still implement those method and just return *"read only file can't to update"* it was break Liskov Subtitution
Principle because save method have ability to save file not givin' an error messages. So the solution is remove save method and make a new class for
writable file and implement the save method there. So when you've a writable file you just use the writable class that intheritance from File Class, if read only you can use
File Class instead.

Example will break these Principle
```php
abstract class File
{
    public function read(string $filename): string
    {
        return 'give full path of file name';
    }

    public function save(string $pathToSave): string
    {
        // code for save the file
    }
}

class ReadOnlyFile extends File
{
    public function save(string $pathToSave): string
    {
        // at super class it will return string, but this return
        // exception instead.
        throw new \Exception('unable write read only document')
    }
}

```

Example suggested by these principle
```php
abstract class File
{
    public function read(string $filename): string
    {
        return 'give full path of file name';
    }
}

class WritableFile extends File
{
   public function save(string $pathToSave): string
    {
        // code for save the file
    }
}

```




### I - Interface Segregation Principle
Interface Segregation Principle it's make you think to try doesn't ever forced some class implement a
method that they don't need. So make sure the interface is skinny and only have specific one.

Imagine you make a library for make easier store a file, we called it FileStorage Library and we make client able to choose
will store to S3 or Internal. As we know internal storage just need a path to store, and S3 need an
integration host, region,and authentication. let's see example below.

Example will break these principle
```php

interface Storage
{
    public function save(string $filename): string;

    public function ListOfregions(): array;

    public function auth(string $client_id, string $secret_key): array
}


class AWS implements Storage
{
    public function save(string $filename): string
    {
        // execute action save into Cloud storage
    }

    public function ListOfregions(): array
    {
        //code to get a list of regions
    }

    public function auth(): array
    {
        //code to get authentication to server
    }
}


class InternalStorage implements Storage
{
    public function save(string $filename): string
    {
        // execute action save into internal storage
    }

    /**
    * as we know the internal don't need
    * region and auth to save a file into internal storage
    * but is a must to implement cause an interface.
    * was break Interface Segregation Principle
    */

    public function ListOfregions(): array
    {
        return '';
    }

    public function auth(): array
    {
        return ''
    }
}
```

Example suggested by these principle
```php

interface Storage
{
    public function save(string $filename): string;
}

interface CloudStorage
{
    public function ListOfregions(): array;

    public function auth(string $client_id, string $secret_key): array
}

class AWS implements Storage, CloudStorage
{
    public function save(string $filename): string
    {
        // execute action save into Cloud storage
    }

    public function ListOfregions(): array
    {
        //code to get a list of regions
    }

    public function auth(): array
    {
        //code to get authentication to server
    }
}


class InternalStorage implements Storage
{
    public function save(string $filename): string
    {
        // execute action save into internal storage
    }
}
```


### D - Dependency Inversion Principle
According to these principle it's make an High level shouldn't directly depends on Low Level, both of them should depends on
Abstraction but Abstraction should not depends on Details, and otherwise.

- Low Level
    >An class implement a complicated logic like connection to database, store a file etc.
- High Level
    >An class have business logic that directs a Low Level to do something.

The High Level doesn't know about Low Level, High level just know how to direct Low Level to do something.

Let's example below
```php
interface File
{
    public function open();

    public function save($pathToSave);
}


class UserPhotoProfile implements File
{

    private $isOpen = false;

    public function open()
    {
        if($this->isOpen) {
            return 'Photo is already open';
        }

        $this->isOpen = true;

        return 'Photo is open with internalStorage';
    }

    public function save($pathToSave)
    {
        //complicated code to save a file
    }
}


class UserPhotoProfileAmazon implements File
{

    private $isOpen = false;

    public function open()
    {
        if($this->isOpen) {
            return 'Photo is already open';
        }

        $this->isOpen = true;

        return 'Photo is open with Amazon S3';
    }

    public function save($pathToSave)
    {
        //complicated code to save a file
    }
}

class UserProfileController
{

    private File $photo;

    public function __construct(File $photo)
    {
        $this->photo = $photo;
    }

    public function profilePhoto()
    {
        return $this->photo->open();
    }
}

 $source = new UserPhotoProfileAmazon;

 // if you need to change the source
 // just change the source above.
 // Don't need hardcode the controller.
 echo (new UserProfileController($source))->profilePhoto()
```

So when the source of photo profile was changed you can changed easily, you just change the source in somewhere.
If you don't According these principle you should hardcode to you all implemented the PhotoProfile Class.
when you change to other Source like AWS S3.


## 🚀 About Me
I'm Stiven Trizky Katuuk who's interested on Backend Development specially at how to make a great Architecture.



## 🔗 Social Media
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/pemudakoding)
[![twitter](https://img.shields.io/badge/twitter-1DA1F2?style=for-the-badge&logo=twitter&logoColor=white)](https://twitter.com/pemudakoding)


