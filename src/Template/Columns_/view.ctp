<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Column'), ['action' => 'edit', $column->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Column'), ['action' => 'delete', $column->id], ['confirm' => __('Are you sure you want to delete # {0}?', $column->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Columns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Column'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Columns'), ['controller' => 'Columns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Column'), ['controller' => 'Columns', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="columns view large-9 medium-8 columns content">
    <h3><?= h($column->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Parent Column') ?></th>
            <td><?= $column->has('parent_column') ? $this->Html->link($column->parent_column->name, ['controller' => 'Columns', 'action' => 'view', $column->parent_column->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($column->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($column->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Lft') ?></th>
            <td><?= $this->Number->format($column->lft) ?></td>
        </tr>
        <tr>
            <th><?= __('Rght') ?></th>
            <td><?= $this->Number->format($column->rght) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Articles') ?></h4>
        <?php if (!empty($column->articles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Column Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Body') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($column->articles as $articles): ?>
            <tr>
                <td><?= h($articles->id) ?></td>
                <td><?= h($articles->user_id) ?></td>
                <td><?= h($articles->column_id) ?></td>
                <td><?= h($articles->title) ?></td>
                <td><?= h($articles->body) ?></td>
                <td><?= h($articles->created) ?></td>
                <td><?= h($articles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Articles', 'action' => 'view', $articles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Articles', 'action' => 'edit', $articles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Articles', 'action' => 'delete', $articles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Columns') ?></h4>
        <?php if (!empty($column->child_columns)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th><?= __('Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($column->child_columns as $childColumns): ?>
            <tr>
                <td><?= h($childColumns->id) ?></td>
                <td><?= h($childColumns->parent_id) ?></td>
                <td><?= h($childColumns->lft) ?></td>
                <td><?= h($childColumns->rght) ?></td>
                <td><?= h($childColumns->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Columns', 'action' => 'view', $childColumns->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Columns', 'action' => 'edit', $childColumns->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Columns', 'action' => 'delete', $childColumns->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childColumns->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
