<?php

namespace Sea\PREG;

# Some useful regular expressions
const EMAIL = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
const NO_SPECIALS = '/^[0-9A-Za-z_]+$/';
const NUMBERS = '/^[0-9]+$/';
const URL = '|^http://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i';
const NAME = '/^[a-zA-Záéíóúàèìòù]+$/';
const NAMES = '/^[a-zA-Záéíóúàèìòù ]+$/';