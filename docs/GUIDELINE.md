# Laravel Guidelines

## Translations should not use snake_case

Translations should use the same case as the original string. This is because the translation is not a variable name,
but a string that is displayed to the user.

```php
// Good
__('This is a translation')

// Bad
__('this_is_a_translation')
```

Reason:

- It's easier to read and understand
- It's easier to search for the original string in the codebase
- Should there no translation available, the original string will be displayed to the user, if it's in `snake_case`, it
  will look bad

