FROM node:12.18-alpine
ENV NODE_ENV=production
WORKDIR E:\PR\transcode
COPY ["package.json", "package-lock.json*", "npm-shrinkwrap.json*", "./"]
RUN npm install --production --silent && mv node_modules ../
COPY . .
EXPOSE 3030
CMD ["npm", "start"]
