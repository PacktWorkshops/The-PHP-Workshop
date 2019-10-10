<?php

interface DriveInterface 
{
	public function changeSpeed($speed);
	public function changeGear($gear);
	public function applyBreak();
}