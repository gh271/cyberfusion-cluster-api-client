<?php

namespace Cyberfusion\ClusterApi;

class Configuration
{
    private const URL_LIVE = 'https://cluster-api.cyberfusion.nl/api/v1/';
    private const URL_SANDBOX = 'https://test-cluster-api.cyberfusion.nl/api/v1/';

    private string $url = self::URL_LIVE;
    private string $username;
    private string $password;
    private ?string $accessToken;
    private bool $sandbox = false;
    private bool $autoDeploy = false;
    private ?string $autoDeployCallbackUrl = null;

    public static function withCredentials(string $username, string $password, bool $sandbox = false): self
    {
        return (new self())
            ->setUsername($username)
            ->setPassword($password)
            ->setSandbox($sandbox);
    }

    public static function withAccessToken(string $accessToken): self
    {
        return (new self())->setAccessToken($accessToken);
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function hasCredentials(): bool
    {
        return !empty($this->username) && !empty($this->password);
    }

    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    public function hasAccessToken(): bool
    {
        return !empty($this->accessToken);
    }

    public function setAccessToken(?string $accessToken): self
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    public function isSandbox(): bool
    {
        return $this->sandbox;
    }

    public function setSandbox(bool $sandbox = false): self
    {
        $this->sandbox = $sandbox;

        $this->url = $sandbox
            ? self::URL_SANDBOX
            : self::URL_LIVE;

        return $this;
    }

    public function autoDeploy(): bool
    {
        return $this->autoDeploy;
    }

    public function setAutoDeploy(bool $autoDeploy = true): self
    {
        $this->autoDeploy = $autoDeploy;

        return $this;
    }

    public function getAutoDeployCallbackUrl(): ?string
    {
        return $this->autoDeployCallbackUrl;
    }

    public function setAutoDeployCallbackUrl(?string $autoDeployCallbackUrl): self
    {
        $this->autoDeployCallbackUrl = $autoDeployCallbackUrl;

        return $this;
    }
}
