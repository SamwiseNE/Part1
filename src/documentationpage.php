<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

class DocumentationPage extends Webpage {

    public function generateDocumentationPage() {
        $this->setBody("Sam Johnston - W17004648 <br/>");
        $this->setBody("2021 KF6012 Assessment Part 1 <br/>");
    }

    /**
     * Set information for the documentation page
     *
     * @param string $name  Set in <h3> tag
     *
     * Set in <p> tag
     * @param string $url
     * @param string $method
     * @param string $parameters
     * @param string $description
     * @param string $authentication
     * @param string $jsonStructure
     * @param string $resultsStructure
     * @param string $codes
     * @param string $example
     *
     */
    public function generateDocumentation(
        $name,
        $url,
        $method,
        $parameters,
        $description,
        $authentication,
        $jsonStructure,
        $resultsStructure,
        $codes,
        $example
    )

    {
        $this->setBody("

        <br>
        <h3> $name </h3> 
        
        <p> 
        $url <br>
        $method <br>
        $parameters <br>
        $description <br>
        $authentication <br>
        $jsonStructure <br>
        $resultsStructure <br>
        $codes <br>
        $example
        </p>");

    }
}

