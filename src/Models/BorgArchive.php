<?php

namespace Cyberfusion\ClusterApi\Models;

use Cyberfusion\ClusterApi\Support\Arr;
use Cyberfusion\ClusterApi\Support\Validator;

class BorgArchive extends ClusterModel
{
    private string $name;
    private ?int $borgRepositoryId = null;
    private ?int $databaseId = null;
    private ?int $unixUserId = null;
    private ?int $id = null;
    private int $clusterId;
    private ?string $createdAt = null;
    private ?string $updatedAt = null;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        Validator::value($name)
            ->maxLength(64)
            ->pattern('^[a-zA-Z0-9-_]+$')
            ->validate();

        $this->name = $name;

        return $this;
    }

    public function getClusterId(): int
    {
        return $this->clusterId;
    }

    public function setClusterId(int $clusterId): self
    {
        $this->clusterId = $clusterId;

        return $this;
    }

    public function getBorgRepositoryId(): ?int
    {
        return $this->borgRepositoryId;
    }

    public function setBorgRepositoryId(?int $borgRepositoryId): self
    {
        $this->borgRepositoryId = $borgRepositoryId;

        return $this;
    }

    public function getDatabaseId(): ?int
    {
        return $this->databaseId;
    }

    public function setDatabaseId(?int $databaseId): self
    {
        $this->databaseId = $databaseId;

        return $this;
    }

    public function getUnixUserId(): ?int
    {
        return $this->unixUserId;
    }

    public function setUnixUserId(?int $unixUserId): self
    {
        $this->unixUserId = $unixUserId;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?string $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function fromArray(array $data): self
    {
        return $this
            ->setName(Arr::get($data, 'name'))
            ->setBorgRepositoryId(Arr::get($data, 'borg_repository_id'))
            ->setDatabaseId(Arr::get($data, 'database_id'))
            ->setUnixUserId(Arr::get($data, 'unix_user_id'))
            ->setId(Arr::get($data, 'id'))
            ->setClusterId(Arr::get($data, 'cluster_id'))
            ->setCreatedAt(Arr::get($data, 'created_at'))
            ->setUpdatedAt(Arr::get($data, 'updated_at'));
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'borg_repository_id' => $this->getBorgRepositoryId(),
            'database_id' => $this->getDatabaseId(),
            'unix_user_id' => $this->getUnixUserId(),
            'id' => $this->getId(),
            'cluster_id' => $this->getClusterId(),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt(),
        ];
    }
}
