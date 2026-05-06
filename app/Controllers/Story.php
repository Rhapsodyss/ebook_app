<?php

namespace App\Controllers;

use App\Models\StoryModel;

class Story extends BaseController
{
    public function index()
    {
        $model = new \App\Models\StoryModel();

        $keyword = $this->request->getGet('search');

        if ($keyword) {
            $stories = $model->like('title', $keyword)->findAll();
        } else {
            $stories = $model->findAll();
        }

        return view('stories/index', [
            'stories' => $stories
        ]);
    }

    public function read($id)
    {
        $model = new \App\Models\StoryModel();

        $data['story'] = $model->find($id);

        return view('stories/read', $data);
    }

    public function search()
    {
        $model = new \App\Models\StoryModel();

        $keyword = $this->request->getGet('keyword');

        $data['stories'] = $model
            ->like('title', $keyword)
            ->findAll();

        $data['keyword'] = $keyword; // biar bisa ditampilkan di view

        return view('stories/index', $data);
    }
}