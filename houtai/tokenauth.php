<?php
//Copyright (c) 2016 iFeiwu.com
 class TokenAuth implements iAuthenticate { function __isAuthenticated() { $token = $_GET["\x74\x6f\153\x65\x6e"]; return $token && $token == TokenAuth::key() ? TRUE : FALSE; } function key() { return require "\164\157\153\x65\156\x2e\x70\150\x70"; } }
