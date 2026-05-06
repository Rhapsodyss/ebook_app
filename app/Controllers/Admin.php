<?php

namespace App\Controllers;

use App\Models\StoryModel;

class Admin extends BaseController
{
    public function index($id = null)
    {
        $model = new \App\Models\StoryModel();

        $data['stories'] = $model->findAll();

        if ($id) {
            $data['edit'] = $model->find($id);
        }

        return view('admin/index', $data);
    }

    public function create()
    {
        return view('admin/create');
    }

    public function store()
    {
        $model = new \App\Models\StoryModel();

        $image = $this->request->getFile('image');
        $bg = $this->request->getFile('background_image');

        $imageName = $image->getRandomName();
        $bgName = $bg->getRandomName();

        $image->move('uploads/', $imageName);
        $bg->move('uploads/', $bgName);

        $model->save([
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'image' => $imageName,
            'background_image' => $bgName,
            'description' => $this->request->getPost('description'),
            'story_detail' => $this->request->getPost('story_detail'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/admin');
    }

    public function edit($id)
    {
        $model = new StoryModel();
        $data['story'] = $model->find($id);

        return view('admin/edit', $data);
    }

    public function update($id)
{
    $model = new \App\Models\StoryModel();

    $story = $model->find($id);

    if (!$story) {
        return redirect()->to('/admin');
    }

    $data = [
        'title' => $this->request->getPost('title'),
        'author' => $this->request->getPost('author'),
        'description' => $this->request->getPost('description'),
        'story_detail' => $this->request->getPost('story_detail'),
        'updated_at' => date('Y-m-d H:i:s')
    ];

    // IMAGE
    $image = $this->request->getFile('image');

    if ($image && $image->isValid() && !$image->hasMoved()) {

        $imageName = $image->getRandomName();
        $image->move('uploads/', $imageName);

        // hapus gambar lama
        if (!empty($story['image']) && file_exists('uploads/' . $story['image'])) {
            unlink('uploads/' . $story['image']);
        }

        $data['image'] = $imageName;
    }

    // BACKGROUND IMAGE
    $bg = $this->request->getFile('background_image');

    if ($bg && $bg->isValid() && !$bg->hasMoved()) {

        $bgName = $bg->getRandomName();
        $bg->move('uploads/', $bgName);

        // hapus background lama
        if (!empty($story['background_image']) && file_exists('uploads/' . $story['background_image'])) {
            unlink('uploads/' . $story['background_image']);
        }

        $data['background_image'] = $bgName;
    }

    $model->update($id, $data);

    return redirect()->to('/admin');
}

    public function delete($id)
    {
        $model = new StoryModel();
        $model->delete($id);

        return redirect()->to('/admin');
    }
}