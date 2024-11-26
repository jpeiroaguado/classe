<?php
function setActive($route){
    return request()->RouteIs($route)?'active':'';
}
