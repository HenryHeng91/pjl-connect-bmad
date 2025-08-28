# \#\# Deployment Architecture

### **Deployment Strategy**

The process will be a manual deployment to the shared hosting environment via SFTP/SSH. Frontend assets will be compiled with `npm run build` before upload.

### **CI/CD Pipeline**

A fully automated pipeline is out of scope for the MVP. However, **GitHub Actions** will be used to automatically run tests and build assets on every push to ensure code quality before manual deployment.

-----
