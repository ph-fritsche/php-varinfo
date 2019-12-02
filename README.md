# Varinfo

DRY helper for describing variables

```php
if (!\is_numeric($foo)) {
    throw new InvalidArgumentException(\sprintf(
        'Expected numeric - %s given',
        new nextdev\Varinfo\Varinfo($foo)
    ));
}
```
