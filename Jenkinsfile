#!/usr/bin/env groovy

pipeline {
  agent any
  stages {
    stage('Prepare Source') {
      steps {
        sh 'composer install'
      }
    }
    stage('Test') {
      steps {
        sh 'phpunit'
      }
    }
  }
}