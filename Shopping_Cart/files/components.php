<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 12/6/2017
 * Time: 11:49 PM
 */
Function isPostRequest()
{
    return(filter_input(INPUT_SERVER,'REQUEST_METHOD') === 'post');
}

Function isGetRequest()
{
    return(filter_input(INPUT_SERVER,'REQIEST_METHOD') === 'get');
}