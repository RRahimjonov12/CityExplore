<?php

class WorldCityRepository {

    function __construct(private PDO $pdo){}

    private function getToModel(array $entry): WorldCityModel{
        
        return new WorldCityModel(
                (int) $entry['id'],
                $entry['city'],
                $entry['city_ascii'],
                (float) $entry['lat'],
                (float) $entry['lng'],
                $entry['country'],
                $entry['iso2'],
                $entry['iso3'],
                $entry['admin_name'],
                $entry['capital'],
                (int) $entry['population']
            );
    }
    
    public function fetch(int $perPage, int $page): array{

        $page = max(1, $page);

        $offSet = ($page-1)*$perPage;

        $stmt = $this->pdo->prepare('SELECT * FROM `worldcities` ORDER BY `population` DESC LIMIT :limit OFFSET :offset');
        $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offSet, PDO::PARAM_INT);
        $stmt->execute();
       
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
         $models = [];
        foreach($entries as $entry){
            $models [] = $this->getToModel($entry);
        }
        return $models;
    }

    public function getCount(): int{

        $countPage = 1;

        $stmt = $this->pdo->prepare('SELECT COUNT(*) AS `count` FROM `worldcities`');
        $stmt->execute();

        $countPage =$stmt->fetch();

        return $countPage['count'];
    }
    
    public function fetchById(int $id): ?WorldCityModel{
        if($id > 0){
            $stmt = $this->pdo->prepare('SELECT * FROM `worldcities` WHERE `id` = :id');
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        
            $entry = $stmt->fetch(PDO::FETCH_ASSOC);

           return $this->getToModel($entry);
        }else{
            return null;
        }
    }
    
    public function update(int $id, array $poperties): WorldCityModel{
        
        $stmt = $this->pdo->prepare('UPDATE `worldcities` 
                                    SET 
                                    `country` = :country,
                                    `city_ascii` = :cityAscii,
                                    `city` = :city,
                                    `population` = :population
                                    WHERE `id` = :id');

        $stmt->bindValue(':country', $poperties['country']);
        $stmt->bindValue(':cityAscii', $poperties['cityAscii']);
        $stmt->bindValue(':city', $poperties['city']);
        $stmt->bindValue(':population', $poperties['population'], PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $this->fetchById($id);

    }
}