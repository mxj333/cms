<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Columns'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Columns'), ['controller' => 'Columns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Column'), ['controller' => 'Columns', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="columns form large-9 medium-8 columns content">
    <?= $this->Form->create($column) ?>
    <fieldset>
        <legend><?= __('Add Column') ?></legend>
        <?php
            echo $this->Form->input('parent_id', ['options' => $parentColumns, 'empty' => true]);
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
