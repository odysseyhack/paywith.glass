pipeline {
	agent any
    stages {
	stage ('checkout scm') {
		steps {
			checkout scm
		}
	}

	stage('PHP deploy') {
            steps {
                sh "sudo cp -r rest-api/* /home/paywithglass/public_html/rest-api"
            }
        }

	stage('NodeJS test') { 
		steps {
			sh ""
		}
	}
    }
}
