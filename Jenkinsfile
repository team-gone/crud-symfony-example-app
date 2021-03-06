#!/usr/bin/env groovy

pipeline {
  agent any
  stages {
    stage('Prepare and configure Source') {
      steps {
        withCredentials([usernamePassword(credentialsId: 'DB_CREDENTIALS', passwordVariable: 'DB_PASSWORD', usernameVariable: 'DB_USER'), usernamePassword(credentialsId: 'MAILER_CREDENTIALS', passwordVariable: 'MAILER_PASSWORD', usernameVariable: 'MAILER_USER')]) {
            sh "sed -e 's#%DB_HOST%#${params.DB_HOST}#;s#%DB_PORT%#${params.DB_PORT}#;s#%DB_NAME%#${params.DB_NAME}#;s#%DB_USER%#${DB_USER}#;s#%DB_PASSWORD%#${DB_PASSWORD}#;s#%MAILER_HOST%#${params.MAILER_HOST}#;s#%MAILER_USER%#${MAILER_USER}#;s#%MAILER_PASSWORD%#${MAILER_PASSWORD}#;s#%SECRET%#${params.SECRET}#' app/config/parameters.yml.dist > app/config/parameters.yml"
        }

        sh 'composer install'
      }
    }
    stage('Test') {
      steps {
        sh 'php vendor/bin/phpunit --coverage-text --colors=never'

        sh 'php vendor/bin/behat'
      }
    }
    stage('QA') {
      steps {
        sh 'php vendor/bin/phploc src'

        sh 'php vendor/bin/phpmd src text phpmd_ruleset.xml'

        sh 'php vendor/bin/phpcs --config-set installed_paths ../../endouble/symfony3-custom-coding-standard/ && php vendor/bin/phpcs --standard=Symfony3Custom src'

        sh 'php vendor/bin/phpcpd src'

        sh 'php vendor/bin/pdepend --summary-xml=/tmp/$(date +"%y-%m-%d-%H%M")-pdepend-report.xml src'
      }
    }
    stage('Deploy') {
      steps {
        sh 'rocketeer deploy --on="production"'
      }
    }
  }
}