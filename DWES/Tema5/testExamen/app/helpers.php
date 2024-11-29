<?php
function setActivo($nombreRuta)
{
    return request()->routeIs($nombreRuta)?'activo':'';
}
