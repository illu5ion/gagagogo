<?php

class SidebarEnhancementsController extends BaseController {

    public function index()
    {
        return View::make('sidebarenhancements::admin.home');
    }
}
